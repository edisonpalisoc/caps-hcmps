const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question('Name: ', (name) => {
  rl.question('Enter a year: ', (yearInput) => {
    const year = parseInt(yearInput);

    if (isNaN(year)) {
      console.log('Error: Please enter a valid year so you can pass this sem');
    } else if ((year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0)) {
      console.log('The input is a leap year');
    } else {
      console.log('The input is not a leap year');
    }

    rl.close();
  });
});

rl.on('close', () => {
  process.exit(0);
});