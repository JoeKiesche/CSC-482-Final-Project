<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="playerInfo.css">
</head>
<body>
    <h2>Please fill in all available information!</h2>
    <!-- 
        Rainbow info SECTION
     -->
        <form action="submit_playerinfo.php" method="post">
        <section id="Rainbow"> 
            <h2>Rainbow Six Siege</h2>         
            <input type="text" name="username1" placeholder="Username">
            <select name="Rank1"> 
                <option value="Copper"> Copper </option>
                <option value="Bronze"> Bronze </option>
                <option value="Silver"> Silver </option>
                <option value="Gold"> Gold </option>
                <option value="Platinum"> Platinum </option>
                <option value="Emerald"> Emerald </option>
                <option value="Diamond"> Diamond </option>
                <option value="Champion"> Champion </option>
            </select>
            <select name="Division1"> 
                <option value="5"> 5 </option>
                <option value="4"> 4 </option>
                <option value="3"> 3 </option>
                <option value="2"> 2 </option>
                <option value="1"> 1 </option>
            </select>
        </section>
        
        <!-- 
            COD info SECTION
         -->
        <section id="COD">   
            <h2>Call of Duty</h2>        
            <input type="text" name="username2" placeholder="Username">
            <select name="Rank2"> 
                <option value="Bronze"> Bronze </option>
                <option value="Silver"> Silver </option>
                <option value="Gold"> Gold </option>
                <option value="Platinum"> Platinum </option>
                <option value="Diamond"> Diamond </option>
                <option value="Crimson"> Crimson </option>
                <option value="Iridescent"> Iridescent </option>
                <option value="Top250"> Top250 </option>
            </select>
            <select name="Division2"> 
                <option value="3"> 3 </option>
                <option value="2"> 2 </option>
                <option value="1"> 1 </option>
            </select>
        </section>

        <!-- 
            CSGO info SECTION
        -->
        <section id="CSGO"> 
            <h2>CSGO</h2>         
            <input type="text" name="username3" placeholder="Username">
            <select name="Rank3"> 
                <option value="Silver1"> Silver 1 </option>
                <option value="Silver2"> Silver 2 </option>
                <option value="Silver3"> Silver 3 </option>
                <option value="Silver4"> Silver 4 </option>
                <option value="SilverElite"> Silver Elite </option>
                <option value="SilverEliteMaster"> Silver Elite Master </option>
                <option value="GoldNova1"> Gold Nova 1 </option>
                <option value="GoldNova2"> Gold Nova 2 </option>
                <option value="GoldNova3"> Gold Nova 3 </option>
                <option value="GoldNovaMaster"> Gold Nova Master </option>
                <option value="MasterGuardian1"> Master Guardian 1 </option>
                <option value="MasterGuardian2"> Master Guardian 2 </option>
                <option value="MasterGuardianElite"> Master Guardian Elite </option>
                <option value="DistinguishedMasterGuardian"> Distinguished Master Guardian </option>
                <option value="LegendaryEagle"> Legendary Eagle </option>
                <option value="LegendaryEagleMaster"> Legendary Eagle Master </option>
                <option value="SupremeMasterFirstClass"> Supreme Master First Class </option>
                <option value="GlobalElite"> Global Elite </option>
            </select>
        </section>

        <!-- 
            VALORANT info SECTION
        -->
        <section id="Valorant"> 
            <h2>Valorant</h2>         
            <input type="text" name="username4" placeholder="Username">
            <select name="Rank4"> 
                <option value="Iron"> Iron </option>
                <option value="Bronze"> Bronze </option>
                <option value="Silver"> Silver </option>
                <option value="Gold"> Gold </option>
                <option value="Platinum"> Platinum </option>
                <option value="Diamond"> Diamond </option>
                <option value="Ascendant"> Ascendant </option>
                <option value="Immortal"> Immortal </option>
                <option value="Radiant"> Radiant </option>
            </select>
            <select name="Division4"> 
                <option value="3"> 3 </option>
                <option value="2"> 2 </option>
                <option value="1"> 1 </option>
            </select>
        </section>

        <!-- 
            APEX info SECTION
        -->
        <section id="Apex Legends"> 
            <h2>Apex Legends</h2>         
            <input type="text" name="username5" placeholder="Username">
            <select name="Rank5"> 
                <option value="Rookie"> Rookie </option>
                <option value="Bronze"> Bronze </option>
                <option value="Silver"> Silver </option>
                <option value="Gold"> Gold </option>
                <option value="Platinum"> Platinum </option>
                <option value="Diamond"> Diamond </option>
                <option value="Master"> Master </option>
                <option value="Predator"> Predator </option>
            </select>
        </section>

        <button type="submit" class="signup"> Submit </button>
    </form>

</body>
</html>
