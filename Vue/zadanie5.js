const arrAWithoutDuplicates = arrA.filter(x => !arrB.includes(x));
const arrBWithoutDuplicates = arrB.filter(x => !arrA.includes(x));
const result = arrAWithoutDuplicates.concat(arrBWithoutDuplicates);