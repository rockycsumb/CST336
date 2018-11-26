    // Javascript Document
    
            // variables
            var selectedWord = "";
            var selectedHint = "";
            var board = [];
            var remainingGuesses = 6;
            //var words = ["snake", "monkey", "beetle"];
            var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
            var words = [{ word: "snake", hint: "It's a reptile" },
                         { word: "monkey", hint: "Its a mammal" }, 
                         { word: "beetle", hint: "Its an insect" }];

            
            // listeners
            window.onload = startGame();
            
            //functions
            function startGame()
            {
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
                showHint();
                
            }
            
            function initBoard()
            {
                for (var letter in selectedWord)
                {
                    board.push("_");
                }
            }
            
            function pickWord()
            {
            var randomInt = Math.floor(Math.random() * words.length);
            selectedWord = words[randomInt].word.toUpperCase();
            selectedHint = words[randomInt].hint;
            
            }
            
            
           function updateBoard()
            {
                $("#word").empty();
                
            for (var letter of board)
                {
                    document.getElementById("word").innerHTML += letter + " ";
                }
                
            $("#word").append("<br />");
            
            
            }
            
            function showHint()
            {
                //$("#showHint").hide();
                $("#btn_showHint").show();
                
                $("#btn_showHint").click(function(){
                   
                   $("#showHint").append("<span class='hint'><h3>Hint: " + selectedHint + "</h3></span>");
                    remainingGuesses -= 1;
                    updateMan();
                    disableButton($(this));
                });
                
                
            }
            
            function createLetters()
            {
                for (var letter of alphabet)
                {
                    $("#letters").append("<button class='letter btn btn-success' id = '" + letter + "'>" + letter + "</button>");
                }
            }
            
            
            //HANDLERS
            $(".letter").click(function() {
               checkLetter($(this).attr("id"));
               disableButton($(this));
            });
            
            $(".replayBtn").on("click", function() {
                location.reload();
            });
            
            // ehck to see selected letter in selectedword
            
            function checkLetter(letter)
            {
                var positions = new Array();
                
                // put all the positions the letter
                for (var i = 0; i < selectedWord.length; i++)
                {
                    console.log(selectedWord)
                    if (letter == selectedWord[i])
                    {
                        positions.push(i);
                    }
                }
                
                if (positions.length > 0)
                {
                    updateWord(positions, letter);
                    if (!board.includes('_'))
                    {
                        endGame(true);
                    }
                }
                else 
                {
                    remainingGuesses -= 1;
                    updateMan();
                }
                
                if (remainingGuesses <= 0)
                {
                    endGame(false);
                }
                
            }
            
            function updateWord(positions, letter)
            {
                for (var pos of positions)
                {
                    board[pos] = letter;
                }
                updateBoard();
                
            }
            
            
            // update the man
            function updateMan()
            {
                $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
            }
            
            function endGame(win)
            {
                $("#letters").hide()
                
                if (win) 
                {
                    $('#won').show();
                    
                }
                else
                {
                    $('#lost').show();
                }
            }
            
            function disableButton(btn)
            {
                btn.prop("disabled", true);
                btn.attr("class", "btn btn-danger");
            }