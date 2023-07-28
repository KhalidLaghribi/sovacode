
    document.addEventListener('DOMContentLoaded', function() {
        var button = document.getElementById('click_bar');
        var element = document.getElementById('list_all');
        var element_list=document.getElementById('list_contact');
    
        button.addEventListener('click', function() {
        if (element.classList.contains('hidden')) {
            element.classList.remove('hidden');
            element_list.classList.remove('hidden');
            element.classList.add('block');
            element_list.classList.add('block');
            element.classList.add('absolute');


        } else {
            element.classList.remove('block');
            element.classList.add('hidden');
            element.classList.remove('absolute');

        }
        });
    });
        
        
    
    
    
    
    
    
    
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
    
    

   