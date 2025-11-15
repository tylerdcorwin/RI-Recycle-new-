// script.js

window.addEventListener('load', function () {
    const numberElements = document.querySelectorAll('.scroll-number'); // Select all number elements
    let animationStarted = false;

    const startNumberAnimation = (numberElement, targetValue) => {
        const duration = 2.2; // Duration in seconds for the animation
        const startTime = performance.now();

        function updateNumber(timestamp) {
            // Calculate how far along the animation we are
            const progress = (timestamp - startTime) / (duration * 1000);

            // Ensure we don't exceed the target value
            const currentValue = Math.min(Math.floor(progress * targetValue), targetValue);

            // Use toLocaleString to format the number with commas
            numberElement.textContent = currentValue.toLocaleString(); // Formats with commas like 20,000

            // If we haven't reached the target value, request another frame
            if (progress < 1) {
                requestAnimationFrame(updateNumber);
            }
        }

        // Start the animation
        requestAnimationFrame(updateNumber);
    };

    // Set up the IntersectionObserver to start the animation when the number container is in view
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('scroll')) {
                // Get the target value from the data-target attribute
                const targetValue = parseInt(entry.target.getAttribute('data-num'), 10);

                // Start the animation for this number
                startNumberAnimation(entry.target, targetValue);

                // Mark the element as animated to avoid triggering the animation again
                entry.target.classList.add('animated');

                // Stop observing this element after animation has started
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 }); // Trigger when 50% of the element is in view

    // Start observing each number element
    numberElements.forEach(numberElement => {
        observer.observe(numberElement);
    });
});
