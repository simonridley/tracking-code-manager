
## Tracking Code Manager - Statamic Addon

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
  
For managing your tracking/analytics scripts, pixels etc.

## Managing tracking scripts

After installing the addon, go to "Tracking Code Mgr" link under Tools in the control panel

Add as many scripts as you need using the repeating blocks.

Choose which tag to output the script on - head, body, footer

You can enable/disable each script individually or disable all using the master switch.

## Usage
  
Add the three output tags to your main layout file in the appropriate places:

    {{ tracking_code_manager:head }}

    {{ tracking_code_manager:body }}

    {{ tracking_code_manager:footer }}

## Issues / Contributing

Find a bug? Have a feature request? I'd be happy to help! Open an issue [on github](https://github.com/austenc/socialize) or reach out on twitter

## License

This project is licensed under the MIT License.