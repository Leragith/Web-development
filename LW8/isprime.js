function isPrimeNumber(num) {
  let isPrime;
  isPrime = true;
  if (typeof num == 'number') {
    for (let j = 2; j < num; j++) {
      if (num % j === 0) {
        isPrime = false;
        break
      }
    }
    if (isPrime) {
      console.log(num, ' is a prime number');
    } else {
      console.log(num, ' is not a prime number');
    }
  } else {
    if (typeof num == 'object') {
      console.log(' is not a prime number');
      for (let c = 0; c < num.length - 1; c++) {
        for (let j = 2; j < num[c]; j++) {
          if (num[c] % j === 0) {
            isPrime = false;
            break
          }
        }
        if (isPrime) {
          console.log(num[c], ' is a prime number');
        } else {
          console.log(num[c], ' is not a prime number');
        }
      }
    }
  }
}

function showAlert() {
  alert("Alert from JS file");
}