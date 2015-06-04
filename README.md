Amazon Coding Challenge Answers
===============================

1) Write a function that, given an input array of variable length and a desired target sum, returns the number of combinations of elements of the input array that add up to that target sum. You can assume all the elements of the array and the target sum to be positive.
--------
Answer 1: Program is attached in this email - Permutations.php

2) Write a full set of unit tests for the above function.
--------
Answer 2: Unit tests attached with this email - PermutationsTest.php

Note:
PHPUnit_Framework will be required to run the test cases so this needs to be installed in the machine.
To install using Composer -> run: composer global require 'phpunit/phpunit:4.6.10'
To test -> run: phpunit -c tests
The folder structure for the project is listed later on this email.

3) How would your program perform in terms of CPU and memory usage for increasingly big arrays?
--------
Answer 3: The CPU and Memory usage would increase linearly as the size of the array increases exponentially.
Explanation:
The loop has to run through all the elements if desired value is greater than the largest element in the list of elements from which the desired sum is to be computed.
So the max complexity the external can have is O(n)
Again, in each iteration, since the array is sorted, the loop needs to run lesser times so the complexity of each iteration is logarithmic.
So the complexity for each iteration is O(log n)

Hence the overall complexity of the algorithm is: **O(n log n)**

This is a recursive algorithm which preforms divide and conquer. So the time goes up linearly (plus a linear loop across all elements) while the n goes up exponentially. e.g. if 10 elements could be calculated in 1 second then 100 elements could be calculated in 2 and 1000 in 3.

4) How could you extend your program to make it work with negative numbers, as well?
----------
Answer 4: The program has been written with negative numbers taken into consideration. This program will work for both negative and positive numbers.


Folder structure:
---------------- 
<basefolder>/tests/phpunit.xml.dist
<basefolder>/tests/PermutationsTest.php
<basefolder>/Permutations.php
<basefolder>/index.php

Run tests (i.e. $ phpunit -c tests) from <basefolder> 
