document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
	  
//        document.getElementById('cento-plug-install').style.visibility="hidden";
       
  } else if (state == 'complete') {
      setTimeout(function(){
//          document.getElementById('interactive');
         document.getElementById('cento-plug-install').style.background = "#fff";
//          document.getElementById('contents').style.visibility="visible";
      },10);
  }
}