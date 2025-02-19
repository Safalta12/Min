document.addEventListener("DOMContentLoaded", function () {

    const suggestions = [
        "Treadmill", "Dumbbells", "Bench Press", "Leg Press",
        "Cardio", "Strength Training", "HIIT", "CrossFit",
        "Monthly Membership", "Yearly Membership", "Personal Training",
        "John Doe - Trainer", "Jane Smith - Yoga Instructor"
    ];

    const searchInput = document.getElementById("searchinput");
    const suggestionsBox = document.getElementById("suggestionsbox");

    if (!searchInput || !suggestionsBox) {
        console.error("Search input or suggestions box not found.");
        return;
    }


    searchInput.addEventListener("input", () => {
        let inputValue = searchInput.value.toLowerCase();
        suggestionsBox.innerHTML = "";
        
        if (inputValue) {
            let filteredSuggestions = suggestions.filter(item => 
                item.toLowerCase().includes(inputValue)
            );

            filteredSuggestions.forEach(suggestion => {
                let suggestionItem = document.createElement("div");
                suggestionItem.textContent = suggestion;

                suggestionItem.addEventListener("click", () => {
                    searchInput.value = suggestion;
                    suggestionsBox.style.display = "none";
                });

                suggestionsBox.appendChild(suggestionItem);
            });

            suggestionsBox.style.display = filteredSuggestions.length ? "block" : "none";
        } else {
            suggestionsBox.style.display = "none";
        }
    });

    document.addEventListener("click", (e) => {
        if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
            suggestionsBox.style.display = "none";
        }
    });
});
