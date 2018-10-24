<html>
    <body>
        <form method='post'> <!--name.php to be called on form submission-->
            <h4>SELECT SUJECTS</h4>
            <select name='subject[]' multiple size=6>  <!--Using multiple to select multiple value-->
                <option value='english'>ENGLISH</option>
                <option value='maths'>MATHS</option>
                <option value='computer'>COMPUTER</option>
                <option value='physics'>PHYSICS</option>
                <option value='chemistry'>CHEMISTRY</option>
                <option value='hindi'>HINDI</option>
            </select>
            <input type='submit' name='submit' value=Submit>
        </form>
    </body>
</html>
<?php
    if(isset($_POST["submit"]))
    {
		if(isset($_POST["subject"]))
		{
			foreach ($_POST['subject'] as $subject)
			{
				print "You selected $subject<br/>";
			}
		}
		else
			echo "select an option first !!";
	}

?>