
CREATE LOGIN ATX2Dev   
    WITH PASSWORD = 'DevATX2';  
GO  

-- Creates a database user for the login created above.  
CREATE USER ATX2Dev FOR LOGIN ATX2Dev;  
GO  