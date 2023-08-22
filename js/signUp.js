

const showPopupBtn = document.getElementById('showPopupBtn');
const popupContainer = document.getElementById('popupContainer');
const closePopupBtn = document.getElementById('closePopupBtn');
const verifyButton = document.getElementById('verifyButton');
const verificationCode = document.getElementById('verificationCode');
const verificationError = document.getElementById('verificationError');
const authCode = document.getElementById('authCode').innerText.trim();


showPopupBtn.addEventListener('click', () => {
    popupContainer.style.display = 'flex';
});

closePopupBtn.addEventListener('click', () => {
    console.log('closed');
    popupContainer.style.display = 'none';
    verificationCode.value = ''; // Clear the verification code input
    verificationError.textContent = ''; // Clear any error messages
});

verifyButton.addEventListener('click', () => {
    const enteredCode = verificationCode.value.trim();

    if (enteredCode === authCode) {
        window.location = 'signupAction.php';
    } else {
        // Verification failed
        verificationError.textContent = 'Invalid verification code. Please try again.';
    }
});