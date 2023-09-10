using System;
using System.Web;
using System.Security.Cryptography;
using System.Text;

public class PostbackHandler : IHttpHandler
{
    public void ProcessRequest(HttpContext context)
    {
        // Retrieve the parameters from the query string
        string refNo = context.Request.QueryString["refNo"];
        string merchantTxnId = context.Request.QueryString["merchantTxnId"];
        string status = context.Request.QueryString["status"];
        string message = context.Request.QueryString["message"];
        string digest = context.Request.QueryString["digest"];

        // Replace this with your actual merchant password
        string merchantPwd = "HnJhcHWyuzN7AKJ";

        // Calculate the expected digest
        string expectedDigest = GetSHA1Digest($"{merchantTxnId}:{refNo}:{status}:{message}:{merchantPwd}");

        // Compare the expected digest with the received digest
        if (string.Equals(digest, expectedDigest, StringComparison.OrdinalIgnoreCase))
        {
            // The digest matches, indicating that the request is valid
            // You can now process the payment result (status) and other information
            // For example, you can log the transaction details or update your database

            // Here, you can write your own logic to handle the payment result
            // For demonstration purposes, we'll simply respond with a success message
            context.Response.Write("Postback received and validated successfully.");
        }
        else
        {
            // The digest does not match, indicating a potentially invalid or tampered request
            // Handle this situation accordingly, such as logging the incident and taking appropriate action
            context.Response.Write("Invalid postback request.");
        }
    }

    public bool IsReusable
    {
        get { return false; }
    }

    public static string GetSHA1Digest(string message)
    {
        byte[] data = Encoding.ASCII.GetBytes(message);
        using (SHA1 sha1 = new SHA1CryptoServiceProvider())
        {
            byte[] result = sha1.ComputeHash(data);
            StringBuilder sb = new StringBuilder();
            for (int i = 0; i < result.Length; i++)
                sb.Append(result[i].ToString("X2"));
            return sb.ToString().ToLower();
        }
    }
}
