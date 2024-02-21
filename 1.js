let new_id = null;

async function getposts()
{
    let res = await fetch('http://localhost:9000/posts');
    let posts = await res.json();

    document.querySelector('.post-list').innerHTML = '';

   posts.forEach((post)=>{
        document.querySelector('.post-list').innerHTML += `
        <h5>${post.tittle}</h5>
        <p>${post.body}</p>
        <a href = "#" onclick="deletepost(${post.id})">Удалить</a>
        <a href = "#" onclick="oldpost(${post.id}, '${post.tittle}', '${post.body}')">Изменить</a>
        `
    })

} 

async function addpost()
{

    let row_tittle = document.getElementById("my_tittle").value;
    let row_body = document.getElementById("my_body").value;
    
    let formdada = new FormData();
    formdada.append('tittle' , row_tittle);
    formdada.append('body' , row_body);

    let res = await fetch('http://localhost:9000/posts' , {
        method: 'POST',
        body: formdada
    });

    await getposts();


    document.getElementById("my_tittle").value = "";
    document.getElementById("my_body").value = "";
}


async function deletepost(id)
{

    let res = await fetch(`http://localhost:9000/posts/${id}` , {
        method: 'DELETE'
    });


    await getposts();

}


async function oldpost(id, tittle, body)
{

    new_id = id;
    document.getElementById("upd_tittle").value = tittle;
    document.getElementById("upd_body").value = body;

}

async function updatepost()
{

    let new_tittle = document.getElementById("upd_tittle").value;
    let new_body = document.getElementById("upd_body").value;

   let data = {
        tittle: new_tittle,
        body: new_body
    };


    let res = await fetch(`http://localhost:9000/posts/${new_id}` , {
        method: 'PATCH',
        body: JSON.stringify(data)
    });


    await getposts();

    document.getElementById("upd_tittle").value = "";
    document.getElementById("upd_body").value = "";
}

getposts();