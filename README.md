# Push2Run-Remote
A web based Push2Run controller. It's a free alternative to Stream Decks, that can be controlled anywhere remotely 

## Before you start
Before you start, you need:
- Somewhere to host the website
- A [Pushbullet](https://www.pushbullet.com/) Account
- [Push2Run](https://push2run.com/)

## Setup Instructions
Follow the instructions in this order, and nothing shall go wrong. 

### Pushbullet
1. Go to the [Pushbullet website](https://www.pushbullet.com/) and sign on to your account (if you don't have one you'll need to create one)
2. Click on 'Settings' in the left navigation bar
3. Click on 'Account' to the top left of the left navigation bar
4. Click on 'Create Access Token', and a box will appear containing your Pushbullet Access Token
5. Copy your Pushbullet Access Token into Notepad (we'll need this twice later)

### Push2Run
1. Install and run Push2Run on your PC or Laptop
2. When Push2Run is first run you should be prompted to setup up Dropbox, Pushbullet, Pushover, or MQTT. We're using Pushbullet.
3. On the Push2Run Options window, in the Pushbullet settings,
4. Check the option 'Enable Pushbullet'
5. Paste your Pushbullet Access Token from your Windows Clipboard into the field named 'Pushbullet Access Token'.
6. Copy what it says in the 'Title filter' field into notepad (We'll need this in the next step), and Click 'OK'.

### Config.php
1. Rename `config.php.template` to `config.php`.
2. Set your preferred username within the `$username` variable.
3. Create your hashed password with the link provided in the config file.
4. Paste the `Title filter` we copied earlier to the `$pushBulletTitle` variable.
5. Paste the Pushbullet Access Token you had in a notepad within the `$pushBulletAuth` variable.

And We're all done with the initial setup. 

## What next? 
It's entirely up to you what you want to add. 

To Add commands to Push2Run, follow [This Link](https://push2run.com/help/help_v4.8.0.0.html) to get started. 

When you add a command, make sure the command you wrote in the `Listen For` section of the `Add/Change` dialog matches the value of the buttons you made. 

Make sure to add value of the buttons you made within `embed.php`'s `$allowedValues` array. This array exists so no one can run other commands you may not wish to run on the website.
