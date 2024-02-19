async function getposts()
{
    let res = await fetch('http://localhost:9000/posts');
    let posts = await res.json();

    document.querySelector('.post-list').innerHTML = '';

   posts.forEach((post)=>{
        document.querySelector('.post-list').innerHTML += `
        <h5>${post.tittle}</h5>
        <p>${post.body}</p>
        <a href = "#">Подробнее</a>
        <a href = "#" onclick="deletepost(${post.id})">Удалить</a>
        `
    })

} 

async function addpost()
{

    let row_id = document.getElementById("my_id").value;
    let row_tittle = document.getElementById("my_tittle").value;
    let row_body = document.getElementById("my_body").value;
    
    let formdada = new FormData();
    formdada.append('id', row_id);
    formdada.append('tittle' , row_tittle);
    formdada.append('body' , row_body);

    let res = await fetch('http://localhost:9000/posts' , {
        method: 'POST',
        body: formdada
    });

    await getposts();


    document.getElementById("my_id").value = "";
    document.getElementById("my_tittle").value = "";
    document.getElementById("my_body").value = "";
}


async function deletepost(id)
{

   console.log(id);
    let res = await fetch(`http://localhost:9000/posts/${id}` , {
        method: 'DELETE'
    });


    await getposts();

}