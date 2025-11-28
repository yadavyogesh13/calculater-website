
let currentInput = '0';
let expression = '0';
let isKeyboardActive = false;

function updateDisplay() {
    document.getElementById('calc-expression').textContent = expression;
    document.getElementById('calc-result').textContent = currentInput;
    
    // Show/hide keyboard focus indicator
    const focusIndicator = document.getElementById('keyboard-focus');
    if (focusIndicator) {
        focusIndicator.style.opacity = isKeyboardActive ? '1' : '0';
    }
}

function appendToCalc(value) {
    if (currentInput === '0' && value !== '.') {
        currentInput = value;
    } else {
        currentInput += value;
    }
    
    if ('+-*/%'.includes(value)) {
        expression = currentInput;
        currentInput = '0';
    }
    
    updateDisplay();
}

function clearCalculator() {
    currentInput = '0';
    expression = '0';
    updateDisplay();
}

function deleteLast() {
    if (currentInput.length > 1) {
        currentInput = currentInput.slice(0, -1);
    } else {
        currentInput = '0';
    }
    updateDisplay();
}

function calculateResult() {
    try {
        // Replace × and ÷ with * and / for evaluation
        let calcExpression = expression + currentInput;
        calcExpression = calcExpression.replace(/×/g, '*').replace(/÷/g, '/');
        
        // Handle percentage calculations
        if (calcExpression.includes('%')) {
            calcExpression = calcExpression.replace(/(\d+)%/g, '($1/100)');
        }
        
        const result = eval(calcExpression);
        currentInput = result.toString();
        expression = calcExpression + ' =';
        updateDisplay();
    } catch (error) {
        currentInput = 'Error';
        updateDisplay();
        setTimeout(() => {
            currentInput = '0';
            expression = '0';
            updateDisplay();
        }, 1500);
    }
}

function setQuickCalculation(calc) {
    try {
        const result = eval(calc);
        currentInput = result.toString();
        expression = calc + ' =';
        updateDisplay();
    } catch (error) {
        currentInput = 'Error';
        updateDisplay();
        setTimeout(() => {
            currentInput = '0';
            expression = '0';
            updateDisplay();
        }, 1500);
    }
}

// Keyboard Event Handler
function handleKeyboardInput(event) {
    isKeyboardActive = true;
    
    const key = event.key;
    
    // Prevent default for calculator keys to avoid unwanted behavior
    if ('0123456789+-*/.%=%'.includes(key) || 
        key === 'Enter' || 
        key === 'Escape' || 
        key === 'Backspace') {
        event.preventDefault();
    }
    
    // Number keys
    if ('0123456789'.includes(key)) {
        appendToCalc(key);
        animateButtonPress(key);
    }
    
    // Operation keys
    else if (key === '+') {
        appendToCalc('+');
        animateButtonPress('+');
    }
    else if (key === '-') {
        appendToCalc('-');
        animateButtonPress('-');
    }
    else if (key === '*') {
        appendToCalc('*');
        animateButtonPress('*');
    }
    else if (key === '/') {
        appendToCalc('/');
        animateButtonPress('/');
    }
    else if (key === '.') {
        appendToCalc('.');
        animateButtonPress('.');
    }
    else if (key === '%') {
        appendToCalc('%');
        animateButtonPress('%');
    }
    
    // Function keys
    else if (key === 'Enter' || key === '=') {
        calculateResult();
        animateButtonPress('Enter');
    }
    else if (key === 'Escape' || key === 'c' || key === 'C') {
        clearCalculator();
        animateButtonPress('Escape');
    }
    else if (key === 'Backspace') {
        deleteLast();
        animateButtonPress('Backspace');
    }
    
    // Update display and reset keyboard active timer
    updateDisplay();
    resetKeyboardTimer();
}

// Animate button press for visual feedback
function animateButtonPress(key) {
    const button = document.querySelector(`[data-key="${key}"]`);
    if (button) {
        button.classList.add('animate-key-press', 'key-active');
        setTimeout(() => {
            button.classList.remove('animate-key-press', 'key-active');
        }, 100);
    }
}

// Reset keyboard active timer
let keyboardTimer;
function resetKeyboardTimer() {
    clearTimeout(keyboardTimer);
    keyboardTimer = setTimeout(() => {
        isKeyboardActive = false;
        updateDisplay();
    }, 2000); // Hide indicator after 2 seconds of inactivity
}

// Initialize calculator and event listeners
document.addEventListener('DOMContentLoaded', function() {
    updateDisplay();
    
    // Add keyboard event listener
    document.addEventListener('keydown', handleKeyboardInput);
    
    // Add click event listeners to all calculator buttons for visual feedback
    const calcButtons = document.querySelectorAll('.calc-btn, .quick-calc-btn');
    calcButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.add('animate-key-press');
            setTimeout(() => {
                this.classList.remove('animate-key-press');
            }, 100);
        });
    });
    
    // Focus management for better UX
    const calculatorContainer = document.querySelector('.bg-white\\/10');
    if (calculatorContainer) {
        calculatorContainer.addEventListener('click', function() {
            this.focus();
        });
        
        calculatorContainer.setAttribute('tabindex', '0');
    }
});

// Handle window focus/blur for keyboard indicator
window.addEventListener('focus', () => {
    isKeyboardActive = false;
    updateDisplay();
});

window.addEventListener('blur', () => {
    isKeyboardActive = false;
    updateDisplay();
});
