document.addEventListener("DOMContentLoaded", function () {
    const calculateButton = document.getElementById("calculate");
    const principalInput = document.getElementById("principal");
    const rateInput = document.getElementById("rate");
    const yearsInput = document.getElementById("years");
    const maturityAmountElement = document.getElementById("maturityAmount");

    calculateButton.addEventListener("click", function () {
        const principal = parseFloat(principalInput.value);
        const rate = parseFloat(rateInput.value);
        const years = parseFloat(yearsInput.value);

        if (!isNaN(principal) && !isNaN(rate) && !isNaN(years)) {
            const interest = (principal * rate * years) / 100;
            const maturityAmount = principal + interest;
            maturityAmountElement.textContent = maturityAmount.toFixed(2);
        } else {
            maturityAmountElement.textContent = "Invalid input";
        }
    });
});
