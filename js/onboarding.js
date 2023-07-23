if (!localStorage.getItem("onboarding-complete")) {
    displayOnboarding();
}

function displayOnboarding() {
    document.getElementById("onboarding-container").style.display = "flex";
    document.getElementById("onboarding-1").style.display = "flex";
}

function finishOnboarding() {
    document.getElementById("onboarding-1").classList.add("fade-out");
    document.getElementById("onboarding-container").style.display = "none";
    document.getElementById("onboarding-1").style.display = "none";
    localStorage.setItem("onboarding-complete", true);
}

function onboardingNavigation(index) {
    document.getElementById(`onboarding-${index}`).style.display = "none";
    index += 1;

    // Check slide numbers
    // If more than 3, close the slides
    if (index <= 3) {
        document.getElementById(`onboarding-${index}`).style.display = "flex";
    } else {
        finishOnboarding();
    }
}