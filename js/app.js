
const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const firstForm = document.getElementById("form1");
const secondForm = document.getElementById("form2");
const container = document.querySelector(".container");

signInBtn.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
    localStorage.setItem("activePanel", "signin");
});

signUpBtn.addEventListener("click", () => {
    container.classList.add("right-panel-active");
    localStorage.setItem("activePanel", "signup");
});

const lastActivePanel = localStorage.getItem("activePanel");

if (lastActivePanel === "signin") {
    container.classList.remove("right-panel-active");
} else {
    container.classList.add("right-panel-active");
}

