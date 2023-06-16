var currentTime;
var offsetTop;
var offsetLeft;
var showMeNow;
function toggleDisplay(me)
{ 
	if (me.style.display=="block") { 
		me.style.display = "none";
		showMeNow = false;		
	} else {
		me.style.display="block";
		me.style.top=offsetTop+'px';
		me.style.left=offsetLeft+'px';
		showMeNow = true;		
	}
} 
function timeHide()
{ 
	if (showMeNow!=true)	
		document.getElementById('timeInput').style.display="none";
	else
		showMeNow=false;
} 
function scwCancel() {
	showMeNow=true;
}
function getTime(textbox, button) {
	currentTime = textbox;
	offsetTop = parseInt(button.offsetTop ,20) + parseInt(button.offsetHeight,3);
	offsetLeft = parseInt(button.offsetLeft,12);
	tempbutton = button;
	do {
		tempbutton=tempbutton.offsetParent;
        offsetTop +=parseInt(tempbutton.offsetTop,10);
        offsetLeft+=parseInt(tempbutton.offsetLeft,10);
	}
    while (tempbutton.tagName!='BODY' && tempbutton.tagName!='HTML');
	toggleDisplay(document.getElementById('timeInput'));
}
function setValue(me) {
	currentTime.value=me.hourList.value + ":" + me.minuteList.value;
	toggleDisplay(document.getElementById('timeInput'));
	
}
document.write('<span id="timeInput" style="display:none;color:blue;position:absolute;z-index:1;top:0px;left:0px;cursor:hand;">');
document.write('<form>');
document.write('<table class="timeInput"><tr><td>');
document.write('<select name="hourList">');
for (var counter = 1; counter <= 24; counter++) {
	if (counter < 10)
		document.write('<option value="0' + counter + '">0' + counter + '</option>');
	else
		document.write('<option value="' + counter + '">' + counter + '</option>');
}
document.write('</select>&nbsp;');
document.write('<select name="minuteList">');
for (var counter = 0; counter <= 59; counter++) {
	if (counter < 10)
		document.write('<option value="0' + counter + '">0' + counter + '</option>');
	else
		document.write('<option value="' + counter + '">' + counter + '</option>');
}
document.write('<input type="button" value="Ok" onClick="setValue(this.form)">');
document.write('</select>&nbsp;');
document.write('</td></tr></table>');
document.write('</form>');
document.write('</span>');

