const nilai = (values) => {
    const nilai90 = values.filter((e)=> e == 90).length;
    if(nilai90 > 0) {
        return 90;
    } 
}

console.log(nilai([90]));
