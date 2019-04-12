<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <style>
                    body{
                        font-family: 'Open Sans Condensed', arial, sans;
                    }

                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    td.day{
                        font-weight: bold;
                    }
                    th, td {
                        text-align: left;
                        padding: 8px;
                    }
                    tr:nth-child(even){
                        background-color: #f2f2f2
                    }
                    th {
                        background-color: #4CAF50;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <h2>Property and Values</h2>
                <table>
                    <tr>
                        <th>Property ID</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Owner ID</th>
                    </tr>
                    <xsl:for-each select="Property/Prop">
                        <tr>
                            <xsl:choose>
                                <xsl:when test="Value>2500000">
                                    <td>
                                        <xsl:value-of select="@id" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="Name" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="Value" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="owner-id" />
                                    </td>
                                </xsl:when>
                                <xsl:otherwise></xsl:otherwise>
                            </xsl:choose>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>