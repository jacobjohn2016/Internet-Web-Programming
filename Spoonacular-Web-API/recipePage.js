$(document).ready(function() {

	var titleId = 'title' + sessionStorage.getItem('idOfClicked');
	var title = sessionStorage.getItem(titleId);

	$('title').html(title);

	var url = window.location.href;
	
	//Get the id of the clicked recipe
	var id = url.split('?')[1].split('=')[1];


	//API Request
	var steps = new XMLHttpRequest();
	steps.open("GET", "https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" + id + "/analyzedInstructions?stepBreakdown=true&mashape-key=btSAgzlS6CmshxyNyEh24vDF8sl2p1w43h9jsnCABHsQZSfxx6", false);
	steps.send();

	var summaryApi = new XMLHttpRequest();
	summaryApi.open("GET", "https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" + id + "/summary?mashape-key=btSAgzlS6CmshxyNyEh24vDF8sl2p1w43h9jsnCABHsQZSfxx6", false);
	summaryApi.send();

	//Parse what API returns
	var stepsParsed = JSON.parse(steps.response);
	var summaryParsed = JSON.parse(summaryApi.response);

	var summary = summaryParsed.summary;

	var container = $('<div/>')
		.attr('id', 'container')
		.appendTo('body');

	var main = $('<div/>')
		.attr('id', 'main')
		.appendTo(container);

	//Add image to DOM
	var imgUrl = sessionStorage.getItem('imageURL' + sessionStorage.getItem('idOfClicked'));
	var img = $('<img/>')
		.attr('id', 'img')
		.attr('src', imgUrl);
	main.append(img);

	//Add title + summary to DOM
	var summaryDiv = $('<div/>')
		.attr('id', 'summary');
	summaryDiv.html("<span id='title'><b>" + title + "</b></span>" + summary);
	main.append(summaryDiv);

	// Add ingredients to DOM
	// var ingredients = $('<div/>')
	// 	.attr('id', 'ingredients')


	var clear = $('<br/>')
		.addClass('clear');
	main.append(clear);

	var description = $('<div/>')
		.addClass('description');
	container.append(description)


	// CREATE INSTRUCTIONS SECTION
	var instructionsTitle = $('<span/>')
		.attr('id', 'instructionsTitle')
		.html("Instructions");

	var instructions = $('<div/>')
		.append(instructionsTitle)
		.addClass('instructions');

	var instructionUl = $('<ol/>');
	instructions.append(instructionUl);
	var j = 1;
	var instructionLi;

	for (var i = 0; i < stepsParsed[0].steps.length; i++) {
		var isNumber =  /^\d+$/.test(stepsParsed[0].steps[i].step);
		if (isNumber) {
			continue;
		}

		instructionLi = $('<li/>')
			.addClass('instructionLi')
			.html(stepsParsed[0].steps[i].step);
		instructionUl.append(instructionLi);

		j += 1
	}


	// CREATE INGREDIENTS SECTION
	var ingredientsTitle = $('<span/>')
		.attr('id', 'ingredientsTitle')
		.html("Ingredients");

	var ingredients = $('<div/>')
		.append(ingredientsTitle)
		.addClass('ingredients');

	var ingredientsUl = $('<ol/>');
	instructions.append(ingredientsUl);
	var j = 1;
	var ingredientLi;
	var ingArray = [];

	// Create array containing recipes (remove all duplicates)
	for (var k = 0; k < stepsParsed[0].steps.length; k++) {
		for (var a = 0; a < stepsParsed[0].steps[k].ingredients.length; a++) {		
			if (k == 0 && a == 0){
				ingArray.push(stepsParsed[0].steps[k].ingredients[a].name);
			} else {
				if ($.inArray(stepsParsed[0].steps[k].ingredients[a].name, ingArray) == -1){
					ingArray.push(stepsParsed[0].steps[k].ingredients[a].name);
				}
			}
		}
	};

	// Append all ingredients from array created above to ingredientsUl
	for (var i = 0; i < ingArray.length; i++){
		ingredientLi = $('<li/>')
			.addClass('ingredientLi')
			.html(ingArray[i]);
		ingredientsUl.append(ingredientLi);
	};

	// Append all sections to DOM
	instructions.append(instructionUl);
	ingredients.append(ingredientsUl);
	description.append(ingredients);
	description.append(instructions);




})
