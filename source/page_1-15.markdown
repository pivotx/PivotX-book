# 1.15 Running multiple websites in one PivotX installation (multi-site)

If you manage several PivotX sites, you know how much work it can be to keep them all up to date. It can also be a lot of work to manage (the same) extensions for all sites. The solution is to run all the websites using one PivotX installation. The websites use the same code base, but have completely separate images, templates and database.  


In the following we'll assume that you've installed PivotX inside the directory "/var/www/pivotx-domains". Then for each website/domain you create the following directory structure:

    /var/www/pivotx-domains/pivotx/sites/www.example.org/db  
    /var/www/pivotx-domains/pivotx/sites/www.example.org/templates  
    /var/www/pivotx-domains/pivotx/sites/www.example.org/images  
    

These three folders must be writable by the web server just like the normal "images", "templates" and "db" folders.   


The virtual host for each website/domain has the same DocumentRoot:

    <VirtualHost *:80>  
    DocumentRoot /var/www/pivotx-domains  
    ServerName www.example.org  
    ....  
    </VirtualHost>
    
That's it. If PivotX is installed in www.example.org/pivotx and the directory pivotx/sites/www.example.org exists, PivotX will jump into multi-site mode for that domain.

  
PS! If you use multi-site you should consider using the transparent multi-site extension. It will make the paths to resources (like images and CSS files) much cleaner.
