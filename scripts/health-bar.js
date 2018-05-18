// Get DOM elements
const $healthBarLeft = document.querySelector('.js-health-bar-left')
const $healthBarRight = document.querySelector('.js-health-bar-right')
const $fillBarLeft = $healthBarLeft.querySelector('.js-health-bar-left_fill')
const $fillBarRight = $healthBarRight.querySelector('.js-health-bar-right_fill')

// Get PHP win state
const leftWinState = $healthBarLeft.dataset.winstate
const rightWinState = $healthBarRight.dataset.winstate

// Attribuate win state for keyframes aniamtions
if(leftWinState == 'win')
{
    $fillBarLeft.style.animationName='winner-damage'
    $fillBarRight.style.animationName='loser-damage'
}
else
{
    $fillBarLeft.style.animationName='loser-damage'
    $fillBarRight.style.animationName='winner-damage'
}

// Generate keyframes
var style = document.createElement('style');
style.type = 'text/css';
var keyFrames = '\
    @keyframes loser-damage {\
        0% {\
            height: 100%;\
        }\
        LOSER_FIRST_STEP {\
            height: LOSER_FIRST_STEP_VALUE;\
        }\
        LOSER_SECOND_STEP {\
            height: LOSER_SECOND_STEP_VALUE;\
        }\
        100% {\
            height: 0;\
        }\
    }\
    @keyframes winner-damage {\
        0% {\
            height: 100%;\
        }\
        WINNER_FIRST_STEP {\
            height: WINNER_FIRST_STEP_VALUE;\
        }\
        100% {\
            height: WINNER_FINAL_STEP_VALUE;\
        }\
    }'
style.innerHTML = keyFrames.replace(/LOSER_FIRST_STEP/, Math.floor(Math.random() * (50 - 90 + 1)) + 90 + '%');
style.innerHTML = keyFrames.replace(/LOSER_FIRST_STEP_VALUE/, Math.floor(Math.random() * (50 - 90 + 1)) + 90 + '%');
style.innerHTML = keyFrames.replace(/LOSER_SECOND_STEP/, Math.floor(Math.random() * (5 - 45 + 1)) + 45 + '%');
style.innerHTML = keyFrames.replace(/LOSER_SECOND_STE_VALUE/, Math.floor(Math.random() * (5 - 45 + 1)) + 45 + '%');
style.innerHTML = keyFrames.replace(/WINNER_FIRST_STEP/, Math.floor(Math.random() * (50 - 90 + 1)) + 90 + '%');
style.innerHTML = keyFrames.replace(/WINNER_FIRST_VALUE/, Math.floor(Math.random() * (50 - 90 + 1)) + 90 + '%');
style.innerHTML = keyFrames.replace(/WINNER_FINAL_STEP_VALUE/, Math.floor(Math.random() * (5 - 45 + 1)) + 45 + '%');
document.getElementsByTagName('head')[0].appendChild(style);