var qno, csrf_token, game_token, time_token;
var refreshTimer;
var points;
var nextQue;
var nextOptions = [];

$(document).ready( function () {
    qno = 1;
    csrf_token = document.querySelector('meta[name="xsrf_token"]').getAttribute('content');
    game_token = document.querySelector('meta[name="game_token"]').getAttribute('content');
    time_token = document.querySelector('meta[name="time_token"]').getAttribute('content');
    points = document.querySelector('#points');
    startTimer();
});

function startTimer() {
    var timer = document.querySelector('#timer');
    var time = 15;
    refreshTimer = setInterval( function () {
        timer.innerHTML = '<h1><strong>00:'+(time < 10 ? '0'+time : time)+'</strong></h1>';
        if(time === 0) {
            // alert('time up');
            disableAllOptions();
            enableNextBtn();
            clearInterval(refreshTimer);
            checkForAns(null, false);
            return;
        }
        time--;
    }, 1000);
}

$('.option').click(function (e) {
    var element = e.toElement;
    checkForAns(element, true);
});

$('#nextQuestion').click(function (e) {
    if(qno >= 11) {
        window.location = '/game/'+game_token ;
        // document.querySelector('#queStatement').innerHTML = '<h2>Quiz Completed<br></h2>';
        // document.querySelector('#options').innerHTML = '';
        disableNextBtn();
        return;
    }
    document.querySelector('#queStatement').innerHTML = '<h2>Q'+qno+'. '+nextQue+'<br><small>Choose one option:</small></h2>';
    var options = document.querySelectorAll('.option');
    options[0].innerHTML = nextOptions[0];
    options[1].innerHTML = nextOptions[1];
    options[2].innerHTML = nextOptions[2];
    options[3].innerHTML = nextOptions[3];
    enableAllOptions();
    startTimer();
    disableNextBtn();
});

function disableAllOptions() {
    var options = document.querySelectorAll('.option');
    options[0].setAttribute('disabled','disabled');
    options[1].setAttribute('disabled','disabled');
    options[2].setAttribute('disabled','disabled');
    options[3].setAttribute('disabled','disabled');
}
function enableAllOptions() {
    var options = document.querySelectorAll('.option');
    options[0].removeAttribute('disabled');
    options[1].removeAttribute('disabled');
    options[2].removeAttribute('disabled');
    options[3].removeAttribute('disabled');
    markReset(options[0]);
    markReset(options[1]);
    markReset(options[2]);
    markReset(options[3]);
}
function enableNextBtn() {
    document.querySelector('#nextQuestion').removeAttribute('disabled');
}

function disableNextBtn() {
    document.querySelector('#nextQuestion').setAttribute('disabled','disabled');
}

function findCorrectElement(answer) {
    var options = document.querySelectorAll('.option');
    if(options[0].innerHTML === answer)
        markCorrect(options[0]);
    else if(options[1].innerHTML === answer)
        markCorrect(options[1]);
    else if(options[2].innerHTML === answer)
        markCorrect(options[2]);
    else if(options[3].innerHTML === answer)
        markCorrect(options[3]);

}

function markCorrect(element) {
    $(element).removeClass('btn-default').addClass('btn-success');
}
function markIncorrect(element) {
    $(element).removeClass('btn-default').addClass('btn-danger');
}
function markReset(element) {
    $(element).removeClass('btn-success').removeClass('btn-danger').addClass('btn-default');
}
function checkForAns(element, mark) {
    $.ajax({
        url: '/game/'+game_token+'/answer/'+qno,
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        method: 'post',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            _token: csrf_token,
            answer: mark ? element.innerHTML : '-1',
            time_token: time_token,
        }),
        success: function (result,status,xhr) {
            if(mark) {
                if(result.answer === element.innerHTML) {
                    markCorrect(element);
                    points.innerHTML = '<h1><strong>Points: '+result.points+'</strong></h1>';
                } else {
                    markIncorrect(element);
                    findCorrectElement(result.answer);
                }
            } else
                findCorrectElement(result.answer);
            disableAllOptions();
            enableNextBtn();
            clearInterval(refreshTimer);
            qno++;
            if(!result.completed) {
                nextQue = result.nextQuestion;
                // console.log(nextQue);
                nextOptions = result.options;
                // console.log(nextOptions);
            } else {
                //alert('Quiz completed');
                // window.location = '/game/'+game_token ;
                document.querySelector('#nextQuestion').innerHTML = "Finish Quiz";
            }
        },
        error: function(xhr,status,error) {
            console.log(error);
        },
        processData: true,
    });
}