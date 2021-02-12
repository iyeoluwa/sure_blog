let replyInput = document.getElementById('replyInput');

replyInput.addEventListener('click',function(e){
    e.preventDefault();
    this.classList.add('slideDown');
});

function clickForReply(inputHouse){
    let input = inputHouse.closest('button');
    input.addEventListener('click',function(e){
        let $this = e.closest('input');
        $this.classList.add('slideDown');
    })
}
