
    let x=document.querySelector('#play').addEventListener('click',function(){
        let y=document.getElementById('section2vid').classList.add("hidden");
        let video_cont=document.getElementById('video_container');
        video_cont.classList.remove("hidden");
        let video = document.getElementById('video');
        video.setAttribute('autoplay','');
    });

    function closevideo(){
        let y=document.getElementById('section2vid').classList.remove("hidden");
        let video_cont=document.getElementById('video_container');
        video_cont.classList.add("hidden");
        let video = document.getElementById('video');
        video.removeAttribute('autoplay','');
        video.pause();
        video.currentTime = 0;
    }
    