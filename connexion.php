<form action="add_ensei.php" method="post">
      <table>
        <tr>
            <td><label>Login :  </label></td>
            <td> <input type="text" name="nom" required id=""></td>
        </tr>
        <tr>
            <td> <label>Password : </td>
            <td></label><input type="text" name="prenom" required id=""></td>
        </tr>
        <tr>
            <td><label>Grade : </label></td>
            <td>
                <select name="grade" id="" >
                    <option value="Docteur">Dr</option>
                    <option value="phd">Phd</option>
                </select>
            </td>
        </tr>
        <tr>
           <td> <input type="submit" value="Ajouter"></td>
           <td> <a href="create.php">Create my account</a></td>
        </tr>
      </table>
    <br>
</form>