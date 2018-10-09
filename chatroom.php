<?php 
      session_start();
      if(!empty($_SESSION['username']))
      {
      ?><?php
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Club Chat</title>
        <!--the bootstrap css-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
	<link href="CSS/clubchat.css" rel="stylesheet">
        <!--  the jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.0/react.min.js" type="text/javascript">
	</script>
</head>
<body class="parallax-demo">
      <header>
        <nav style="background-color: #2196F3; height: 70px;">
          <div class="container">
            <div class="nav-wrapper"style="margin-top: 10px;">
                <a href="clubs.php" class="brand-logo" style="font-size: 35px; color: white;" >Clubs and Societies</a>
            </div>
          </div>
        </nav>
      </header>
	</div>
	<div style='background-color: white; margin-top: 30px;'>
		<div id="app"></div>
                    <?php
		    $name = $_SESSION['username'];
		    echo "
		    <script>
		\"use strict\";

		var commentData = [{
		  author: \"Maureen \",
		  text: \"We have been invited over by JKUAT for an Event anyone intereted, please register.\"
		}, {
		  author: \"Sam Karenju\",
		  text: \"I will send over th details of the Event Later.\"
		}];
		var CommentBox = React.createClass({
		  displayName: \"CommentBox\",

		  getInitialState: function getInitialState() {
		    return {
		      data: commentData
		    };
		  },
		  handleCommentSubmit: function handleCommentSubmit(comment) {
		    this.props.data.push(comment);
		    var comments = this.state.data;
		    var newComments = comments.concat([comment]);
		    this.setState({ data: newComments });
		  },
		  render: function render() {
		    return React.createElement(
		      \"div\",
		      { className: \"comment-box\" },
		      React.createElement(CommentForm, {
		        data: this.props.data,
		        onCommentSubmit: this.handleCommentSubmit
		      }),
		      React.createElement(CommentList, { data: this.props.data })
		    );
		  }
		});
		var CommentList = React.createClass({
		  displayName: \"CommentList\",

		  render: function render() {
		    return React.createElement(
		      \"div\",
		      { className: \"comment-list\" },
		      this.props.data.map(function (c) {
		        return React.createElement(Comment, { author: c.author, text: c.text });
		      })
		    );
		  }
		});
		var CommentForm = React.createClass({
		  displayName: \"CommentForm\",

		  handleSubmit: function handleSubmit(e) {
		    e.preventDefault();
		    var authorVal = \"$name\";
		    var textVal = e.target[0].value.trim();
		    if (!textVal || !authorVal) {
		      return;
		    }
		    this.props.onCommentSubmit({ author: authorVal, text: textVal });
		    e.target[0].value = \"\";
		    e.target[1].value = \"\";
		    return;
		  },
		  render: function render() {
		    return React.createElement(
		      \"form\",
		      { className: \"comment-form form-group\", onSubmit: this.handleSubmit },
		      
		      React.createElement(
		        \"div\",
		        { className: \"input-group\" },
		        React.createElement(
		          \"span\",
		          { className: \"input-group-addon\" },
		          \"Comment\"
		        ),
		        React.createElement(\"input\", {
		          type: \"text\",
		          placeholder: \"Say something...\",
		          className: \"form-control\"
		        })
		      ),
		      React.createElement(\"input\", { type: \"submit\", value: \"Post\", className: \"btn btn-primary\" })
		    );
		  }
		});
		var Comment = React.createClass({
		  displayName: \"Comment\",

		  render: function render() {
		    return React.createElement(
		      \"div\",
		      { className: \"comment\" },
		      React.createElement(
		        \"h2\",
		        { className: \"author\" },
		        this.props.author
		      ),
		      this.props.text
		    );
		  }
		});
		React.render(React.createElement(CommentBox, { data: commentData }), document.getElementById(\"app\"));
		        </script>";
		        ?><a href="clubs.php"><button type="submit" style="margin-left: 60px; margin-top: 40px;" name="submit2" class="btn btn-danger">Back</button></a>
	</div>
            </body>
</html><?php
	      }
	      else{
	          header('Location: index.php');
	      }
	?>
