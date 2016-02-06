
/*

chrome.runtime.onMessage.addListener(
    function(request, sender, sendResponse) {
   /*     console.log(sender.tab ?
        "from a content script:" + sender.tab.url :
            "from the extension");
        if (request.greeting == "hello")
            sendResponse({farewell: "goodbye"});

        getTags(sender.tab.title);
        return true;
    });
*/

var sub,title,url,text,subject = "";

var getTags = function(){

   //************** getting subjects
    var URL = "http://feelmagic.xyz/notex/api/tagNames.php";
    var hr = new XMLHttpRequest();
    hr.open("GET",URL,false);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.ontimeout = function () {
        console.error("The request for " + URL + " timed out.");
    };
    hr.onreadystatechange = function(){
        if(hr.readyState == 4 && hr.status == 200){
            sub = hr.responseText.split(',');
        }else{
            sub = ["python","database","chrome","protocol","HTML","php","Mongodb","xml","cassandra","jsp","json","math","equation","JavaScript","math","network","meaning","Synonyms","dictionary","java","django","tech","windows","hadoop","jquery","mysql","linux","ubuntu","operating","database"," c ","android","data","cobol","basic","ruby"];
        }

    };
    hr.send();
};







var formFill = function(){

    getTags();
    chrome.tabs.executeScript(null,{file:"getSelection.js"},function(response){
        document.getElementById("editor").innerHTML = response;
        document.getElementById("text").innerHTML=response;

    });

    chrome.tabs.query({active: true,
        currentWindow: true
    }, function (tabs) {

        var activeTab = tabs[0];

        title = activeTab.title;
        url = activeTab.url;


        var length = sub.length;

        for(var i = 0; i<length ;i++){
            if(title.indexOf(sub[i]) > -1){
                subject = sub[i];
            }
        }
        if(subject == "")
        subject = "other";

        document.getElementById("title").value = subject;
        document.getElementById("topic").value = title;
        document.getElementById("linkText").innerHTML = url;



    })
};


formFill();