var el = document.getElementsByClassName("schedule-lists")[0];
var scheduleTitle = el.getElementsByClassName("schedule-title");
var json = '{';
for (var i = 0; i < scheduleTitle.length; i++) {

	json += '\"judul' + i + '\":{\"title\":';
	var titleText = scheduleTitle[i].getElementsByTagName("a")[0];
	json += '\"' + titleText.innerText + '\",';

	var splt = titleText.nextElementSibling.innerHTML.replace(/(\r\n|\n|\r)/gm, "");
	splt = splt.split("/");
	json += '\"genre\":\"' + splt[0].trim() + '\",';

	json += '\"durasi\":\"' + splt[1].trim().replace("Minutes", "").trim() + '\",';

	var tmp = splt[2].trim().split(" ");
	year = tmp[tmp.length - 1].trim();
	json += '\"tahun\":\"' + year + '\",';

	var par = scheduleTitle[i].parentNode;
	var showtimeList = par.getElementsByClassName("showtime-lists");
	json += '\"jam_tayang\":';

	var arrJam = [];
	for (var j = 0; j < showtimeList.lenzgth; j++) {
		var time = showtimeList[j].getElementsByTagName("li");
		for (var k = 0; k < time.length; k++) {
			var timeText = time[k].getElementsByTagName("a")[0];
			var attrMov = timeText.getAttribute("attr-mov").trim();
			if (attrMov == titleText.innerText) {
				arrJam.push(timeText.innerText);
			}
		}
	}
	json += JSON.stringify(arrJam);
	if (i < scheduleTitle.length - 1) {
		json += '},';
	} else {
		json += '}';
	}
}
json += '} ';

document.body.innerHTML = "";
var form = document.createElement("form");
form.setAttribute("method", "POST");
form.setAttribute("action", "http://localhost/web-scraping/public/Scraper/insert_film");
var input = document.createElement("input");
input.setAttribute("type", "hidden");
input.setAttribute("name", "json");
input.setAttribute("value", json);
form.appendChild(input);
document.body.appendChild(form);
form.submit();