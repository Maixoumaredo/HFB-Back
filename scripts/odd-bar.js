// Get DOM elements
const $oddBar = document.querySelector('.js-odd-bar')
const $oddBarLeftSide = $oddBar.querySelector('.js-odd-bar_left-side')
const $oddBarRightSide = $oddBar.querySelector('.js-odd-bar_right-side')

// Get PHP odds
const oddLeft = $oddBarLeftSide.dataset.odd
const oddRight = $oddBarRightSide.dataset.odd

// Transform odds to width ratio
const oddBarWidth = $oddBar.offsetWidth
const barLeftWidth = Math.floor(1 / oddLeft * oddBarWidth)
const barRightWidth = Math.floor(oddBarWidth - barLeftWidth)

// Applicate to bar style
$oddBarLeftSide.style.width = barLeftWidth
$oddBarRightSide.style.width = barRightWidth

// Generate keyframes
var style = document.createElement('style');
style.type = 'text/css';
var keyFrames = '\
    @keyframes expense-left {\
        0% {\
            width: 0;\
        }\
        100% {\
            width: A_VALUE;\
        }\
    }\
    @keyframes expense-right {\
        0% {\
            width: 0;\
        }\
        100% {\
            width: B_VALUE;\
        }\
    }'
style.innerHTML = keyFrames.replace(/A_VALUE/, barLeftWidth);
style.innerHTML = keyFrames.replace(/B_VALUE/, barRightWidth);
document.getElementsByTagName('head')[0].appendChild(style);