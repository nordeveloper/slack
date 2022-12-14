# slack composer package, require only php curl

- usage example composer nordeveloper/slack
- required
<code>
- use Nordeveloper\Slack;
- $slackData['SLACK_WEBHOOK_URL'] = 'your slack web hook url';
- $slackData['channel'] = 'your slack chanel';
- $slackData['text'] = 'slack message';
- optional
- $slackData['username'] = 'slack username optional';

- $slack = new Slack($slackData);
- $res = $slack->send($slackData);
</code>