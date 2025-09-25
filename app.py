import os
from langchain import hub
from langchain.prompts import ChatPromptTemplate
from langchain_community.tools.tavily_search import TavilySearchResults
from langchain_groq import ChatGroq
from langchain.agents import AgentExecutor, create_react_agent
from fastapi import FastAPI
from langserve import add_routes

# تنظیم کلیدهای API
os.environ["TAVILY_API_KEY"] = "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"
os.environ["GROQ_API_KEY"] = "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"

# تنظیم مدل Groq
llm = ChatGroq(
    model="llama-3.3-70b-versatile",
    temperature=0.5,
)

# تنظیم ابزار جستجو
tools = [TavilySearchResults(max_results=1)]

# تنظیم پرامپت
template = """You are an expert football analyst that provides detailed information about football/soccer players.

Your primary task is to identify player names in user queries and use your tools to gather accurate information about them.

When a user mentions a player (or when you need to find information about a player):
1. ALWAYS use the search tool to get up-to-date information about the player
2. Extract the player's name from the user's query
3. If the player name is ambiguous or incomplete, ask for clarification

For each player, provide:
- Basic biographical information (age, nationality, position)
- Current club and jersey number
- Career statistics and achievements
- Playing style and strengths
- Notable moments in their career
- Recent news or developments (injuries, transfers, etc.)
- Comparison with other players when relevant

Answer the following questions as best you can. You have access to the following tools:

{tools}

Use the following format:

Question: the input question you must answer
Thought: you should always think about what to do
Action: the action to take, should be one of [{tool_names}]
Action Input: the input to the action
Observation: the result of the action
... (this Thought/Action/Action Input/Observation can repeat N times)
Thought: I now know the final answer
Final Answer: the final answer to the original input question

Begin!

Question: {input}
Thought:{agent_scratchpad}
"""
prompt = ChatPromptTemplate.from_template(template)

# ساخت ایجنت
agent = create_react_agent(llm, tools, prompt)
agent_executor = AgentExecutor(agent=agent, tools=tools, verbose=True, handle_parsing_errors=True)

# تنظیم FastAPI
app = FastAPI(
    title="Iconic Agent API",
    description="API for Iconic Agent to provide football player information",
    version="1.0",
)

# اضافه کردن مسیر برای ایجنت
add_routes(app, agent_executor, path="/agent")

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8001)