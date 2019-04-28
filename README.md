1) Link to live demo https://twitchdemoaweem.herokuapp.com/
2) Link to git repo https://github.com/aweemaslam/twitchdemoaweem

I  used Twitch provded api code sample and modified according to my own need.

3) How would you deploy the above on AWS? (ideally a rough architecture diagram will help)

Ans: On AWS I will depoloyee my application in docker container. Firstly, I will commit my code to github -> setup EC2 instace on AWS -> Install CodeDeploy Agent on EC2 -> Setup Up CodeDeploy Agent -> Setup code pipeline with github and will create a pipline to deployee my code to AWS.

4)Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/day to 900MM reqs/day over 6 months?

Ans: Yet there is no bottleneck as all of the work done is using api calls(untial Api Servers are capable enough to handle 900MM requests). If after enhancing the functionality other than the api calls then I will probably scale up the docker containers and provide more process and memory to instance.