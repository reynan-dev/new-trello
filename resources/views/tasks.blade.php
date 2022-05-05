

@extends('layouts.app')

@section('content')



<!-- Board info bar -->
<section class="board-info-bar">

	<div class="board-controls">


		<button class="star-btn btn" aria-label="Star Board">
			<i class="far fa-star" aria-hidden="true"></i>
		</button>

	</div>


</section>
<!-- End of board info bar -->

<!-- Lists container -->
<section class="lists-container">

	<div class="list">

		<h3 class="list-title">Tasks to Do</h3>

		<ul class="list-items">
			<li>Complete mock-up for client website</li>
			<li>Email mock-up to client for feedback</li>
			<li>Update personal website header background image</li>
			<li>Update personal website heading fonts</li>
			<li>Add google map to personal website</li>
			<li>Begin draft of CSS Grid article</li>
			<li>Read new CSS-Tricks articles</li>
			<li>Read new Smashing Magazine articles</li>
			<li>Read other bookmarked articles</li>
			<li>Look through portfolios to gather inspiration</li>
			<li>Create something cool for CodePen</li>
			<li>Post latest CodePen work on Twitter</li>
			<li>Listen to new Syntax.fm episode</li>
			<li>Listen to new CodePen Radio episode</li>
		</ul>

		<button class="add-card-btn btn">Add a card</button>

	</div>

	<div class="list">

		<h3 class="list-title">Current task
            </h3>

		<ul class="list-items">
			<li>Clear email inbox</li>
			<li>Finalise requirements for client web design</li>
			<li>Begin work on mock-up for client website</li>
		</ul>

		<button class="add-card-btn btn">Add a card</button>

	</div>

	<div class="list">

		<h3 class="list-title">Completed Tasks</h3>

		<ul class="list-items">
			<li>HTML Elements</li>
			<li>HTML Form Validation</li>
			<li>HTML Structured Data</li>
			<li>Advanced CSS Selectors</li>
			<li>CSS Transforms</li>
			<li>CSS Animations</li>
			<li>CSS Flexbox</li>
			<li>CSS Grid</li>
			<li>CSS Methodologies (BEM, SMACSS etc.)</li>
			<li>SASS/SCSS</li>
			<li>Layout Fallbacks</li>
			<li>Responsive Design</li>
			
		</ul>

		<button class="add-card-btn btn">Add a card</button>

	</div>

	




</section>
<!-- End of lists container -->
@endsection


<style>

/* :root {
    font-size: 10px;
} */

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    background-color: #0079bf;
}

.btn {
    display: flex;
    justify-content: center;
    align-items: center;
    font: inherit;
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
}

:focus {
    outline-color: #fa0;
}


/* Lists */

.lists-container::-webkit-scrollbar {
    height: 2.4rem;
}

.lists-container::-webkit-scrollbar-thumb {
    background-color: #66a3c7;
    border: 0.8rem solid #0079bf;
    border-top-width: 0;
}

.lists-container {
    display: flex;
    align-items: start;
    justify-content: center;
    padding: 0 0.8rem 0.8rem;
    overflow-x: auto;
    height: calc(100vh - 8.6rem);
}

.list {
    flex: 0 0 27rem;
    display: flex;
    flex-direction: column;
    background-color: #e2e4e6;
    max-height: calc(100vh - 11.8rem);
    border-radius: 0.3rem;
    margin-right: 1rem;
}

.list:last-of-type {
    margin-right: 0;
}

.list-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    padding: 1rem;
}

.list-items {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-content: start;
    padding: 0 0.6rem 0.5rem;
    overflow-y: auto;
}

.list-items::-webkit-scrollbar {
    width: 1.6rem;
}

.list-items::-webkit-scrollbar-thumb {
    background-color: #c4c9cc;
    border-right: 0.6rem solid #e2e4e6;
}

.list-items li {
    font-size: 1.4rem;
    font-weight: 400;
    line-height: 1.3;
    background-color: #fff;
    padding: 0.65rem 0.6rem;
    color: #4d4d4d;
    border-bottom: 0.1rem solid #ccc;
    border-radius: 0.3rem;
    margin-bottom: 0.6rem;
    word-wrap: break-word;
    cursor: pointer;
}

.list-items li:last-of-type {
    margin-bottom: 0;
}

.list-items li:hover {
    background-color: #eee;
}

.add-card-btn {
    display: block;
    font-size: 1.4rem;
    font-weight: 400;
    color: #838c91;
    padding: 1rem;
    text-align: left;
    cursor: pointer;
}

.add-card-btn:hover {
    background-color: #cdd2d4;
    color: #4d4d4d;
    text-decoration: underline;
}



.add-card-btn::after {
    content: '...';
}

/*



*/

@supports (display: grid) {
    body {
        display: grid;
        grid-template-rows: 4rem 3rem auto;
        grid-row-gap: 0.8rem;
    }

    .masthead {
        display: grid;
        grid-template-columns: auto 1fr auto;
        grid-column-gap: 2rem;
    }

    .boards-menu {
        display: grid;
        grid-template-columns: 9rem 18rem;
        grid-column-gap: 0.8rem;
    }

    .user-settings {
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-column-gap: 0.8rem;
    }

    .board-controls {
        display: grid;
        grid-auto-flow: column;
        grid-column-gap: 1rem;
    }

    .lists-container {
        display: grid;
        grid-auto-columns: 27rem;
        grid-auto-flow: column;
        grid-column-gap: 1rem;
    }

    .list {
        display: grid;
        grid-template-rows: auto minmax(auto, 1fr) auto;
    }

    .list-items {
        display: grid;
        grid-row-gap: 0.6rem;
    }

    .logo,
    .list,
    .list-items li,
    .boards-btn,
    .board-info-bar,
    .board-controls .btn,
    .user-settings-btn {
        margin: 0;
    }
}

</style>