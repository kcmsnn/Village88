//Algorithm 5

/*Algorithm V
Given an array and a value Y, count and print the number of array values greater than Y.*/

function GreaterThanY(arr,y){
  ctr = 0;
  tmp = [];
  for(var i = 0; i < arr.length; i++){
    if(arr[i] > y){
      ctr++;
      tmp.push(arr[i]);
    }
  }
  console.log('in numbers '+ arr +' there are ' + ctr + ' numbers greater than ' + y);
  return tmp;
}
z = GreaterThanY([1,2,3,4,5],3);
console.log('these are numbers are: ' + z);

/*Given an array, print the max, min and average values for that array.*/
function MinMaxAve(arr){
var max = arr[0];
var min = arr[0];
var ave = 0;  
var sum = 0;
    for(var i = 0; i < arr.length; i++){
        if( arr[i] < min){
            min=arr[i];
        }else if(arr[i] > max){
            max=arr[i];
        }
      sum = sum + arr[i];        
    }
    ave = sum / arr.length;
    console.log(arr.length);
    console.log('The Minimun is: ' + min);
    console.log('The Maximum is: ' + max);
    console.log('The Average is: ' + arr[2]);
    return [min,max,ave];  
}

MinMaxAve([2,5,3,6,7,10]);



/*Given an array of numbers, create a function that returns a new array where negative values
 were replaced with the string ‘Dojo’.   For example, replaceNegatives( [1,2,-3,-5,5]) should
 return [1,2, "Dojo", "Dojo", 5].*/

function ReplaceNegatives(arr){
  for(var i = 0;i<arr.length;i++){
    if(arr[i]<0){
    arr[i]='Dojo';
    }
  }
  return arr;
}
z = ReplaceNegatives([1,2,-3,-5,5]);
console.log(z);

/*Given array, and indices start and end, remove values in that index range, working in-place 
(hence shortening the array).  For example, removeVals([20,30,40,50,60,70],2,4) should return [20,30,70].*/

function RemoveVal(arr,start,end){
for(var i = start; i <=end; i++){
    var tmp = arr[i];
    for(var j = i; j < arr.length - 1; j++){
        arr[j] = arr[j + 1];
    }
    arr[arr.length - 1] = tmp;
    arr.pop();
    i--;
    end--;
}
return arr;
}
z = RemoveVal([20,30,40,50,60,70],2,4) ;
console.log(z);

//Algoritm 6
/*Return the given array, after setting any negative values to zero.
For example resetNegatives( [1,2,-1, -3]) should return [1,2,0,0].*/
function resetNegatives(arr){
    for (let i = 0; i < arr.length; i++) {
        if (arr[i] < 0) {
            arr[i] = 0;
        }
    }
    return arr;
}
z = resetNegatives([1,2,-1,-3]);
console.log(z);

/*Given an array, move all values forward by one index, dropping the
first and leaving a ‘0’ value at the end.  For example moveForward( [1,2,3]) should return [2,3,0].*/
function moveForward(arr) {
    for (let i = 0; i < arr.length-1; i++) {
            arr[i] = arr[i + 1];
    }        
    arr[arr.length -1] = 0; 
    return arr;
}
z = moveForward([1,2,3]);
console.log(z);

/*Given an array, return an array with values in a reversed order.  
For example, returnReversed([1,2,3]) should return [3,2,1].*/

function returnReversed(arr) {    
    for (let i = 0; i < arr.length/2; i++) {
        var tmp = 0;
        tmp = arr[i];
        arr[i] = arr[arr.length - 1 - i];
        arr[arr.length - 1 - i] =tmp;
    }
    return arr;
}
z = returnReversed([1,2,3,4,5,6,7]);
console.log(z);


/*Create a function that changes a given array to list each original element twice, 
retaining original order.  Have the function return the new array.  
For example repeatTwice( [4,”Ulysses”, 42, false] ) should return [4,4, “Ulysses”, “Ulysses”, 42, 42, false, false].*/
function repeatTwice(arr) {
    var tmp = [];
    for (let i = 0; i < arr.length; i++) {
        tmp.push(arr[i]);
        tmp.push(arr[i]);        
    }
    return tmp
}
z = repeatTwice([4,'Ulysses', 42, false]);
console.log(z);