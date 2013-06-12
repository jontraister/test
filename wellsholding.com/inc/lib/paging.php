<?php

/*

   EXAMPLE:

   include($_SERVER["DOCUMENT_ROOT"] . "/classes/paging.class.php");
   $paging = new PagedResults();
   $paging->TotalResults = 500; //This is how many results to page through.
                                //mysql_num_rows($query) would just fine!
   print_p($paging->InfoArray());

*/

class PagedResults {

	
   /* These are defaults */
   var $TotalResults;
   var $CurrentPage = 1;
   var $PageVarName = "page";
   var $ResultsPerPage = 20;
   var $LinksPerPage = 10;
   var $InfoArray = array();
 

   function PagedResults($ResultPerPage = '', $LinksPerPage = '')
   {
   	  	$this -> ResultsPerPage = $ResultPerPage;
   		$this -> LinksPerPage = $LinksPerPage;
   }
   
   function GetInfoArray() {
      $this->TotalPages = $this->getTotalPages();
      $this->CurrentPage = $this->getCurrentPage();
      $this->ResultArray = array(
                           "PREV_PAGE" => $this->getPrevPage(),
                           "NEXT_PAGE" => $this->getNextPage(),
                           "CURRENT_PAGE" => $this->CurrentPage,
                           "TOTAL_PAGES" => $this->TotalPages,
                           "TOTAL_RESULTS" => $this->TotalResults,
                           "PAGE_NUMBERS" => $this->getNumbers(),
                           "MYSQL_LIMIT1" => $this->getStartOffset(),
                           "MYSQL_LIMIT2" => $this->ResultsPerPage,
                           "START_OFFSET" => $this->getStartOffset(),
                           "END_OFFSET" => $this->getEndOffset(),
                           "RESULTS_PER_PAGE" => $this->ResultsPerPage,
                           );
      return $this->ResultArray;
   }
   function GetTotalRecords()
   {
      return  $this->TotalResults;
   }

   /* Start information functions */
   function getTotalPages() {
      /* Make sure we don't devide by zero */
      if($this->TotalResults != 0 && $this->ResultsPerPage != 0) {
         $result = ceil($this->TotalResults / $this->ResultsPerPage);
      }
      /* If 0, make it 1 page */
      if(isset($result) && $result == 0) {
         return 1;
      } else {
         return $result;
      }
   }

   function getStartOffset() {
      $offset = $this->ResultsPerPage * ($this->CurrentPage - 1);
      if($offset != 0) { $offset++; }
      return $offset;
   }

   function getEndOffset() {
      if($this->getStartOffset() > ($this->TotalResults - $this->ResultsPerPage)) {
         $offset = $this->TotalResults;
      } elseif($this->getStartOffset() != 0) {
         $offset = $this->getStartOffset() + $this->ResultsPerPage - 1;
      } else {
         $offset = $this->ResultsPerPage;
      }
      return $offset;
   }
	
   function getCurrentPage() {
      if(isset($_GET[$this->PageVarName])) {
         return $_GET[$this->PageVarName];
      } else {
         return $this->CurrentPage;
      }
   }

   function getPrevPage() {
      if($this->CurrentPage > 1) {
         return $this->CurrentPage - 1;
      } else {
         return false;
      }
   }

   function getNextPage() {
      if($this->CurrentPage < $this->TotalPages) {
         return $this->CurrentPage + 1;
      } else {
         return false;
      }
   }

   function getStartNumber() {
      $links_per_page_half = ceil($this->LinksPerPage / 2);
      /* See if curpage is less than half links per page */
      if($this->CurrentPage <= $links_per_page_half || $this->TotalPages <= $this->LinksPerPage) {
         return 1;
      /* See if curpage is greater than TotalPages minus Half links per page */
      } elseif($this->CurrentPage >= ($this->TotalPages - $links_per_page_half)) {
         return $this->TotalPages - $this->LinksPerPage + 1;
      } else {
         return $this->CurrentPage - $links_per_page_half;
      }
   }

   function getEndNumber() {
      if($this->TotalPages < $this->LinksPerPage) {
         return $this->TotalPages;
      } else {
         return $this->getStartNumber() + $this->LinksPerPage - 1;
      }
   }

   function getNumbers() {
      for($i=$this->getStartNumber(); $i<=$this->getEndNumber(); $i++) {
         $numbers[] = $i;
      }
      return $numbers;
   }
   /*****************************************************************/
   function RunPagging($strSQL)
   {
   		
		$this -> TotalResults = Records(Run($strSQL));
		$this -> InfoArray = $this->GetInfoArray();
		$start = ($this->CurrentPage == 1) ? 0 : $this->getStartOffset()-1;
		$end = $this->ResultsPerPage;
		$Limit = " LIMIT $start, $end";
		
		$RS = Run($strSQL.$Limit);
		
		return $RS;
  }
   /******************************************************************/
   
   function DisplayPaging()
  {
  	$InfoArray = $this -> InfoArray;
  // echo "Displaying page " . $InfoArray["CURRENT_PAGE"] . " of " . $InfoArray["TOTAL_PAGES"] . "<BR>";
  echo "Displaying results " . $InfoArray["START_OFFSET"] . " - " . $InfoArray["END_OFFSET"] . " of " . $InfoArray["TOTAL_RESULTS"] . "<BR>";

   /* Print our first link */
   if($InfoArray["CURRENT_PAGE"]!= 1) {
      echo "<a href='?page=1'>&lt;&lt;</a> ";
   } else {
      echo "&lt;&lt; ";
   }

   /* Print out our prev link */
   if($InfoArray["PREV_PAGE"]) {
      echo "<a href='?page=" . $InfoArray["PREV_PAGE"] . "'>Previous</a> | ";
   } else {
      echo "Previous | ";
   }

   /* Example of how to print our number links! */
   for($i=0; $i < count($InfoArray["PAGE_NUMBERS"]); $i++) {
      if($InfoArray["CURRENT_PAGE"] == $InfoArray["PAGE_NUMBERS"][$i]) {
         echo $InfoArray["PAGE_NUMBERS"][$i] . " | ";
      } else {
         echo "<a href='?page=" . $InfoArray["PAGE_NUMBERS"][$i] . "'>" . $InfoArray["PAGE_NUMBERS"][$i] . "</a> | ";
      }
   }

   /* Print out our next link */
   if($InfoArray["NEXT_PAGE"]) {
      echo " <a href='?page=" . $InfoArray["NEXT_PAGE"] . "'>Next</a>";
   } else {
      echo " Next";
   }

   /* Print our last link */
   if($InfoArray["CURRENT_PAGE"]!= $InfoArray["TOTAL_PAGES"]) {
      echo " <a href='?page=" . $InfoArray["TOTAL_PAGES"] . "'>>></a>";
   } else {
      echo " &gt;&gt;";
   }
} // DisplayPaging()

}// Class Ends

?> 