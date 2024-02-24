function calculateBMI(name, height, weight,)
{
    const heightInMeters = height / 100; 

    const bmi = weight / (heightInMeters * heightInMeters);

    return `${name}'s BMI is: ${bmi.toFixed(2)}`;
    
}

const userName = "Erin";
const userHeight = 175; // in centimeters
const userWeight = 70; // in kilograms

const result = calculateBMI(userName, userHeight, userWeight);
console.log(result);