# Push2Run-Remote
A web based Push2Run controller. It's a free alternative to Stream Decks, that can be controlled anywhere remotely 

![image](https://github.com/HBIDamian/Push2Run-Remote/assets/10010369/8d50d3e0-2324-4265-a2ff-d12f47d73145)

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

When you add a command, make sure the command you wrote in the `Listen For` section of the `Add/Change` dialog matches the value of the buttons you made in buttons.json. 

### Buttons.json
This is where you can add buttons to the website.

Example:
```json
[
    {
        "ButtonName": "Button 1",
        "ButtonColour": "red"
    },
    {
        "ButtonName": "Button 2",
        "ButtonColour": "green"
    }
]
```
The `ButtonName` is the name of the button that will appear on the website, and should match the command you wrote in the `Listen For` section of the `Add/Change` dialog in Push2Run.

The default colours are `blue`, `green`, `red`, `orange`, `purple`, `yellow`, `white`, `black`, `grey`, `pink`, `brown`. However, you can add your own colours by adding the colour to the `main.css` file.

## TODO:
- [ ] Try to debug the Push Bullet issue with the title variable not passing through.
- [ ] Add MQTT compatibility.
- [ ] Tidy up a lil bit. It's a wee bit messy now.

## Credits
- [Push2Run](https://push2run.com/) - Push2Run is a free program that lets you control your PC or Laptop from anywhere using your voice or your Android phone or tablet.
- [Pushbullet](https://www.pushbullet.com/) - Pushbullet connects your devices, making them feel like one.
- [Twemoji](https://twemoji.twitter.com/) - Twemoji is an open-source emoji project, created and owned by Twitter. Emojis from Twemoji are found on the Twitter.com website, TweetDeck, Twitter for Android, Discord, Roblox and other apps.
- [Bootstrap](https://getbootstrap.com/) - Bootstrap is an open source toolkit for developing with HTML, CSS, and JS.
- The round background - The design of the round background was created by [fghty on CodePen](https://codepen.io/fghty/pen/PojKNEG).
