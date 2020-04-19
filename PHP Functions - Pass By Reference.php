/*
Description:
PHP Functions - Pass By Reference
About this Kata Series
"PHP Functions" is a Kata Series authored by donaldsebleung which focuses on the perks and interesting features of PHP functions. It is un-numbered which means that the Kata in this Series is not progressive - one kata in this Series does not necessarily depend on another. This means that as long as you know how to write "Hello World" level programs in PHP, you will probably find any Kata in this Series easy to pick up and complete.

There is, however, one main prerequisite. You must be sufficiently familiar with primitive data types in PHP (strings, booleans, floats, integers) and what they mean. You must also have a basic understanding of how to define a simple function in PHP that may or may not receive a fixed number of arguments. A good indicator that you are ready for any Kata in this Series is if you are able to complete Multiply (8kyu) in PHP without looking at external resources in the process. If you are unable to complete that Kata without researching PHP function syntax then you may have to practice with basic PHP functions until you are familiar with them before continuing on this Kata series.

Certain Kata in this Series may have additional prerequisites. If that is the case, the extra prerequisites will be listed under a Level 2 Heading called Prerequisites in said Kata. Additionally, if a certain Kata in this Series requires a thorough understanding of PHP, the kata may be labelled as [Advanced].

Lesson
In PHP, most values/variables are passed into a function by value by default (except for objects). This means that a PHP programmer does not have to worry about ensuring that their function is clean most of the time (N.B. a clean function is one that does not modify the values/variables passed in). For example:

function add_world($s) {
  $s .= "world";
}
$hello = "Hello ";
add_world($hello); // We would expect $hello to now be "Hello world" if the variable was passed by reference in PHP
echo $hello; // still "Hello " - variable was not modified
function add_three($n) {
  $n += 3;
}
$number = 5;
add_three($number); // If variables are pass by reference in PHP then $number would now be 8
echo $number; // still 5, demonstrating the fact that primitives are pass-by-value in PHP

// Even arrays are "pass-by-value" (this is actually not entirely true but we will not go into the details for this lesson)

function swap_first_and_second_items($a) {
  $temp = $a[0];
  $a[0] = $a[1];
  $a[1] = $temp;
}

$array = array(1, 2, 3);
swap_first_and_second_items($array); // would the array now be array(2, 1, 3)?
var_dump($array); // still array(1, 2, 3)
However, sometimes, we want our function to be able to actively modify the variable being passed in. Fortunately, in PHP, there is a way to specify in the function declaration which arguments should be passed in by reference by prefixing an ampersand & to the parameter(s) we want to actively modify:

function add_world(&$s) {
  // Notice how the parameter $s now has an ampersand & prefixed to it - this means that this argument will be passed in by **reference** instead of value
  $s .= "world";
}
$hello = "Hello ";
add_world($hello);
echo $hello; // Now our function works as expected and "Hello world" is printed to the screen

function add_three(&$n) {
  // $n is now passed in by reference
  $n += 3;
}
$number = 5;
add_three($number);
echo $number; // Prints 8 to the screen as expected

function swap_first_and_second_items(&$a) {
  // The array is now passed in by reference
  $temp = $a[0];
  $a[0] = $a[1];
  $a[1] = $temp;
}

$array = array(1, 2, 3);
swap_first_and_second_items($array);
var_dump($array); // Shows the structure of the array is now array(2, 1, 3)
Note that if a function definition requires an argument to be passed in by reference, any attempt to pass in a raw value will result in a fatal error:

function add_three(&$n) {
  // The function definition requires $n to be passed in by reference
  $n += 3;
}

add_three(5); // Fatal error because $n was passed in by value instead of by reference
It should be obvious, but in case you aren't aware, pass-by-reference is on a parameter-to-parameter basis:

function some_function($a, &$b, $c) {
  // $a and $c are passed in by *value* while $b is passed in by **reference**
  /* Some code */
}
Task
Note: The lesson provided in this Kata is designed to teach you most, if not all, of the key concepts required to complete the Task in this Kata. However, if in doubt, you are strongly encouraged to conduct your own research.

Define and implement the following functions:

double - This function should receive a number $n which should be passed into the function by reference. The function should then double the value of $n and store this (new) value in $n. No return value is necessary.
halve - This function should receive a number $n which should again be passed in by reference. Inside the function, $n should be halved. No return value is necessary.
enlarge - This function should receive two arguments, the first argument being $x which should be passed in by reference, and the second argument being $n which should be passed in by value. Both arguments are expected to be numbers. $x should then be enlarged by a factor of $n in the function. No return value is necessary.
*/
function double(&$n){
  $n = $n * 2;
}

function halve(&$n){
  $n = $n / 2;
}

function enlarge(&$x,$n){
  $x = $n * $x;
}
