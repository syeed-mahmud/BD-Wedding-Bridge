 function print() {
    let x = document.getElementById(wedcard_template);
    html2pdf()
    .from(x)
    .save('Wedding Card.pdf');
}