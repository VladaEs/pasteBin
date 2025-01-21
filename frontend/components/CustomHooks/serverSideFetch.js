

const fetchData = async (apiPath)=>{

    const res = await fetch(process.env.API_PATH + apiPath);
    if (!response.ok) {
        throw new Error('Failed to fetch data');
      }
    return await response.json();

} 
export default fetchData;