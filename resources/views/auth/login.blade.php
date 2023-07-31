<h1>AQUI IRA EL LOGIN</h1>

<form method="POST" action="/users/">
  @csrf    
  <input type="text" name="username"> <br/><br/>
  <input type="password" name="password"> <br/>
  <input type="submit" name="submit" value="Submit">
</form>