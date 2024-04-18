var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    }
    else {
        var img = document.createElement("img");
        img.src = "https://sun9-47.userapi.com/impf/c305512/v305512800/5c42/7Nz1rCqntv8.jpg?size=307x189&quality=96&sign=44239d077bbee4c846384ddd762ce8de&c_uniq_tag=vC8WSVzjkDu573oMPfw_qA4TkVCBpqVHuLVFphw0fuY&type=album"
        document.getElementById("demo").appendChild(img);
    }
}