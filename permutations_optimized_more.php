<?php
//@todo: Change all code to use sentance case!!!

$inputArray = array(1, 3, 4, 5, 6, 2, 7, 8, 9, 10, 11, 13, 14, 15);
$desiredSum = 15;

//$inputArray = array(5, 5, 15, 10);
//$desiredSum = 15;

$permutations = new permutations();
$totalCombinations = $permutations->findAllPermutations($inputArray, $desiredSum);
print "\n\n ### " . $totalCombinations . " ###\n\n";exit;

class permutations {
    
  private $totalCombinations;
  
  public function __construct() {
    $this->totalCombinations = 0;
  }
  
  public function findAllPermutations($inputArray, $desiredSum) {
    
    $length = count($inputArray);
    
    // Sort it beofre sending it so that we can insure we 
    // can skip values that are larger than the desired sum.
    $sortedInputArray = $this->quick($inputArray);
    
    $this->getDesiredCombinations($sortedInputArray, 0, $length, $desiredSum);
    
    return $this->totalCombinations;
  }

  
  private function getDesiredCombinations($inputArray, $fromIndex, $toIndex, $remainder, $combinations = array()) {
    // Check if the remainder sum is zero 0.
    // This means the sum of combinations equals desired sum.
    if ($remainder == 0) {
      // The combinations are equal to desired sum so increment number to combinations.
      $this->add();
      return;
    }
    
    // Skip all values of start index if adding them will exceed desired value.
    while ($fromIndex < count($inputArray) && $inputArray[$fromIndex] > $remainder) {
      $fromIndex++;
    }
    
    // stop looping when we run out of data, or when we overflow our remainder.
    while ($fromIndex < count($inputArray) && $inputArray[$fromIndex] <= $remainder) {
      $combinations[$toIndex] = $inputArray[$fromIndex];
      // Remainder decreases by matching value.
      $remainder1 = $remainder - $inputArray[$fromIndex];
      // Check the next index.
      $fromIndex1 = $fromIndex + 1;
      $toIndex1 = $toIndex + 1;
      $this->getDesiredCombinations($inputArray, $fromIndex1, $toIndex1, $remainder1, $combinations);
      $fromIndex++;
    }
  }
  
  private function add() {
    $this->totalCombinations++;
  }
  
  /**
  * Quick Sort.
  * Sort the data array at the beginning.
  * This allows to skip values that are larger than the desired sum.
  */
  public function quick($unsorted_data) {
    $size = count($unsorted_data);
    if($size <= 1) {
      return $unsorted_data;
    }
    $pivot = $unsorted_data[floor($size/2)];
    $left = array();
    $right = array();
    $equal = array();
    for($i = 0; $i < $size; $i++) {
      if($pivot > $unsorted_data[$i]) {
        $left[] = $unsorted_data[$i];
      }
      else if($pivot < $unsorted_data[$i]) {
        $right[] = $unsorted_data[$i];
      }
      else {
        $equal[] = $unsorted_data[$i];
      }
    }
    $left_arr = $this->quick($left);
    $right_arr = $this->quick($right);
    return array_merge($left_arr, $equal, $right_arr);
  }
}

