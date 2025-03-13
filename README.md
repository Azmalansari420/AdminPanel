1. go to folder
cd C:/xampp/htdocs/admin

2. Initialize Git in the Folder
   git init

4. Connect to a GitHub Repository
Go to GitHub → Create a new repository (without adding a README).
Copy the repository URL (e.g., https://github.com/your-username/your-repo.git).
Now, link your local folder to GitHub:

git remote add origin https://github.com/your-username/your-repo.git

Verify the remote URL:

git remote -v



6. 
git config --global user.name Azmalansari420
git config --global user.email azmal.codediffusion@gmail.com


5. Add and Commit Files
git add .
git commit -m "Initial commit"

6. Push Code to GitHub

git branch -M main
git push -u origin main

7. 
git pull origin main --rebase
git push origin main

3. Force Push (If Necessary)
	git push origin main --force
⚠️ Warning: This will overwrite any remote changes, so use it carefully!
