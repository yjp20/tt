document.addEventListener("DOMContentLoaded", function() {
	var bar = document.getElementById("reading-progress")
	var single = document.getElementById("content")
	var rect = document.body.getBoundingClientRect()
	bar.min = single.getBoundingClientRect().top - rect.top
	bar.max = single.getBoundingClientRect().bottom - rect.top - window.innerHeight;

	document.addEventListener('scroll', function() {
		value = window.scrollY
		bar.setAttribute('value', value)
	})
})
