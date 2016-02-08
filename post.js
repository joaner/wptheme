(function(article, navBox){
var titles = article.querySelectorAll('h2,h3,h4,h5');
var navs = {}, topNavs = [];
for(var k in titles) {
	var title = titles[k];
	if (!title.tagName) {
		continue;
	}
	var order = title.tagName.replace(/H/, '');
	navs[order] = title;
	if (typeof navs[order-1] !== 'undefined') {
		if (typeof navs[order-1].navChilds == 'undefined') {
			navs[order-1].navChilds = [];
		}
		navs[order-1].navChilds.push(title);
	} else {
		topNavs.push(title);
	}
}

var createItem = function(ele) {
	var li = document.createElement('li');
	var a = document.createElement('a');
	if (!ele.id) ele.id = ele.innerText;
	ele.className += ' anchor';
	a.href = '#'+encodeURIComponent(ele.id);
	a.innerText = ele.innerText;

	li.appendChild(a);
	return li;
}

var createNavs = function(ele) {
	var li = createItem(ele);
	if (ele.navChilds) {
		var ul = document.createElement('ul');
		ul.className = 'nav';
		for(var k in ele.navChilds) {
			ul.appendChild(createItem(ele.navChilds[k]));
		}
		li.appendChild(ul);
	}
	return li;
}

var ul = document.createElement('ul');
    ul.className = 'nav';
for(var k in topNavs) {
	var li = createNavs(topNavs[k]);
	ul.appendChild(li);
}
navBox.appendChild(ul);
})(document.querySelector('.post>article'), document.querySelector('.post-nav'));
